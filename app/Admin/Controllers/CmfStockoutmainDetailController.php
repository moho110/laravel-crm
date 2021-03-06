<?php

namespace App\Admin\Controllers;

use App\Models\CmfStockoutmainDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStockoutmainDetailController extends AdminController {

	protected $title = "出库单明细";

    public function index(Content $content)
    {
        return $content
            ->header('出库单明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStockoutmainDetail());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('prodid', __('产品ID'));
                $grid->column('prodname', __('产品名称'));
                $grid->column('prodguige', __('产品规格'));
                $grid->column('prodxinghao', __('产品型号'));
                $grid->column('proddanwei', '产品单位');
                $grid->column('price', __('产品价格'));
                $grid->column('zhekou', __('产品折扣'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStockoutmainDetail());
                $form->text('prodid', __('产品ID'))
                ->creationRules('required|max:200|unique:cmf_stockoutmain_detail',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('prodname', __('产品名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodguige', __('产品规格'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodxinghao', __('产品型号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('proddanwei', __('产品单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('产品价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('zhekou', __('产品折扣'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('num', __('产品数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('mainrowid', __('主ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('avgprice', __('均价'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('lirun', __('利润'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('出库单明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('出库单明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStockoutmainDetail());
        return $content
            ->header('出库单明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStockoutmainDetail::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('prodid', __('产品ID'));
        $show->field('prodname', __('产品名称'));
        $show->field('prodguige', __('产品规格'));
        $show->field('prodxinghao', __('产品型号'));
        $show->field('proddanwei', __('产品单位'));
        $show->field('price', __('产品价格'));
        $show->field('zhekou', __('产品折扣'));
        $show->field('num', __('产品数量'));
        $show->field('beizhu', __('备注'));
        $show->field('mainrowid', __('主ID'));
        $show->field('jine', __('金额'));
        $show->field('avgprice', __('均价'));
        $show->field('lirun', __('利润'));
        return $show;
        }
}

?>