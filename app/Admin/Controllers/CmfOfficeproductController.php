<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeproduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeproductController extends AdminController {

	protected $title = "办公用品";

    public function index(Content $content)
    {
        return $content
            ->header('办公用品')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeproduct());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('officeName', __('办公用品名称'));
                $grid->column('officeNo', __('办公用品编号'));
                $grid->column('officeType', __('办公用品类型'));
                $grid->column('specSize', __('规格尺寸'));
                $grid->column('unit', '单位');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeproduct());
                $form->text('officeName', __('办公用品名称'))
                ->creationRules('required|max:200|unique:cmf_officeproduct',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('officeNo', __('办公用品编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('officeType', __('办公用品类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('specSize', __('规格尺寸'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('unit', __('单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('quantity', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('warehouseInfo', __('仓库信息'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('价格'))->symbol('rmb')
                ->rules('required');
                $form->currency('totalCount', __('总金额'))->symbol('rmb')
                ->rules('required');
                $form->text('brand', __('品牌'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('savedPlace', __('保存位置'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('办公用品');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('办公用品')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeproduct());
        return $content
            ->header('办公用品')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeproduct::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('officeName', __('办公用品名称'));
        $show->field('officeNo', __('办公用品编号'));
        $show->field('officeType', __('办公用品类型'));
        $show->field('specSize', __('规格尺寸'));
        $show->field('unit', __('单位'));
        $show->field('quantity', __('数量'));
        $show->field('warehouseInfo', __('仓库信息'));
        $show->field('price', __('价格'));
        $show->field('totalCount', __('总金额'));
        $show->field('brand', __('品牌'));
        $show->field('savedPlace', __('保存位置'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>