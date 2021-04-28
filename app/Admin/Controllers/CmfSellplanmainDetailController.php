<?php

namespace App\Admin\Controllers;

use App\Models\CmfSellplanmainDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSellplanmainDetailController extends AdminController {

	protected $title = "采购计划明细";

    public function index(Content $content)
    {
        return $content
            ->header('采购计划明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSellplanmainDetail());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('prodid', __('产品ID'));
                $grid->column('prodname', __('产品名称'));
                $grid->column('prodguige', __('产品规格'));
                $grid->column('prodxinghao', __('产品型号'));
                $grid->column('proddanwei', '产品单位');
                $grid->column('createtime', __('创建时间'));
                $grid->column('plandate', __('计划日期'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSellplanmainDetail());
                $form->text('prodid', __('产品ID'))
                ->creationRules('required|max:200|unique:cmf_sellplanmain_detail',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('prodname', __('产品名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodguige', __('产品规格'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodxinghao', __('产品型号'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('proddanwei', __('产品单位'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('产品价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('zhekou', __('产品折扣'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('num', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('mainrowid', __('主ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chukunum', __('出库数量'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('plandate', __('计划日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('qici', __('期次'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('yaoqiu', __('要求'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('iftixing', __('是否提醒'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('lirun', __('利润'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('oldprodid', __('过往产品ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('opertype', __('操作类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('采购计划明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('采购计划明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSellplanmainDetail());
        return $content
            ->header('采购计划明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSellplanmainDetail::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('prodid', __('产品ID'));
        $show->field('prodname', __('产品名称'));
        $show->field('prodguige', __('产品规格'));
        $show->field('prodxinghao', __('产品型号'));
        $show->field('proddanwei', __('产品单位'));
        $show->field('price', __('产品价格'));
        $show->field('zhekou', __('产品折扣'));
        $show->field('num', __('数量'));
        $show->field('beizhu', __('备注'));
        $show->field('mainrowid', __('主ID'));
        $show->field('jine', __('金额'));
        $show->field('chukunum', __('出库数量'));
        $show->field('plandate', __('计划日期'));
        $show->field('qici', __('期次'));
        $show->field('yaoqiu', __('要求'));
        $show->field('iftixing', __('是否提醒'));
        $show->field('createtime', __('创建时间'));
        $show->field('lirun', __('利润'));
        $show->field('oldprodid', __('过往产品ID'));
        $show->field('opertype', __('操作类型'));
        return $show;
        }
}

?>