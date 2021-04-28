<?php

namespace App\Admin\Controllers;

use App\Models\CmfWorkplanshenhe;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfWorkplanshenheController extends AdminController {

	protected $title = "任务计划审核";

    public function index(Content $content)
    {
        return $content
            ->header('任务计划审核')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfWorkplanshenhe());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('name', __('名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfWorkplanshenhe());
                $form->text('name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_workplanshenhe',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('任务计划审核');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('任务计划审核')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfWorkplanshenhe());
        return $content
            ->header('任务计划审核')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfWorkplanshenhe::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        return $show;
        }
}

?>