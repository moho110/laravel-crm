<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduBuilding;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduBuildingController extends AdminController {

	protected $title = "教学楼";

    public function index(Content $content)
    {
        return $content
            ->header('教学楼')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduBuilding());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('buildingNo', __('教学楼编号'));
                $grid->column('buildingName', __('教学楼名称'));
                
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduBuilding());
                $form->text('buildingNo', __('教学楼编号'))
                ->creationRules('required|max:200|unique:cmf_edu_building',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('buildingName', __('教学楼名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('教学楼');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('教学楼')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduBuilding());
        return $content
            ->header('教学楼')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduBuilding::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('buildingNo', __('教学楼编号'));
        $show->field('buildingName', __('教学楼名称'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>