<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeproductgroup;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeproductgroupController extends AdminController {

	protected $title = "仓库分类";

    public function index(Content $content)
    {
        return $content
            ->header('仓库分类')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeproductgroup());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('Name', __('名称'));
                $grid->column('sort', __('排序'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeproductgroup());
                $form->number('Name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_officeproductgroup',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('sort', __('排序'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('preClassType', __('预置类型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('仓库分类');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('仓库分类')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeproductgroup());
        return $content
            ->header('仓库分类')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeproductgroup::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('Name', __('名称'));
        $show->field('sort', __('排序'));
        $show->field('preClassType', __('预置类型'));
        return $show;
        }
}

?>