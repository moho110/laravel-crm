<?php

namespace App\Admin\Controllers;

use App\Models\CmfBuyplanmainDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfBuyplanmainDetailController extends AdminController {

	protected $title = "采购单名细";

    public function index(Content $content)
    {
        return $content
            ->header('采购单名细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfBuyplanmainDetail());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('prodid', __('产品ID'));
                $grid->column('prodname', __('产品名称'));
                $grid->column('prodguige', __('产品规格'));
                $grid->column('prodxinghao', __('产品型号'));
                $grid->column('proddanwei', '产品单位');
                $grid->column('opertype', '操作类')
                    ->display(function ($opertype) {
                        return $opertype ? '是' : '否';
                    });
                
                $grid->column('price', __('产品价格'));
                $grid->column('num', __('产品数量'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfBuyplanmainDetail());
                $form->number('prodid', __('产品ID'))
                ->creationRules('required|max:200|unique:cmf_buyplanmain_detail',
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
                $form->rate('zhekou', __('产品折扣'))
                ->creationRules('required|max:3',
                        ['required' => '此项不能为空','max' =>'不能大于3个字符']);
                $form->number('num', __('产品数量'))
                ->creationRules('required', ['required' => '产品数量不能为空']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('mainrowid', __('主列ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('recnum', __('最新数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('oldprodid', __('过往产品ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('lastprice', __('最终价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('opertype', __('操作类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('采购单名细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('采购单名细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfBuyplanmainDetail());
        return $content
            ->header('采购单名细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfBuyplanmainDetail::findOrFail($id));

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
        $show->field('mainrowid', __('主列ID'));
        $show->field('recnum', __('最新数量'));
        $show->field('jine', __('金额'));
        $show->field('oldprodid', __('过往产品ID'));
        $show->field('lastprice', __('最终价格'));
        $show->field('opertype', __('操作类型'));
        return $show;
        }
}

?>