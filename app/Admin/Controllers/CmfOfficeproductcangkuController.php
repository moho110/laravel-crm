<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeproductcangku;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeproductcangkuController extends AdminController {

	protected $title = "办公用品仓库";

    public function index(Content $content)
    {
        return $content
            ->header('办公用品仓库')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeproductcangku());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('warehouseName', __('仓库名称'));
                $grid->column('warehouseMan', __('仓库管理员'));
                $grid->column('telphone', __('电话号码'));
                $grid->column('warehouseAddress', __('仓库地址'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeproductcangku());
                $form->number('warehouseName', __('仓库名称'))
                ->creationRules('required|max:200|unique:cmf_officeproductcangku',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('warehouseMan', __('仓库管理员'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('telphone', __('电话号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('warehouseAddress', __('仓库地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('办公用品仓库');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('办公用品仓库')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeproductcangku());
        return $content
            ->header('办公用品仓库')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeproductcangku::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('warehouseName', __('仓库名称'));
        $show->field('warehouseMan', __('仓库管理员'));
        $show->field('telphone', __('电话号码'));
        $show->field('warehouseAddress', __('仓库地址'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>