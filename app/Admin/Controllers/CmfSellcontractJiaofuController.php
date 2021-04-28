<?php

namespace App\Admin\Controllers;

use App\Models\CmfSellcontractJiaofu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSellcontractJiaofuController extends AdminController {

	protected $title = "销售合同交付";

    public function index(Content $content)
    {
        return $content
            ->header('销售合同交付')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSellcontractJiaofu());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('customerid', __('客户ID'));
                $grid->column('hetongid', __('合同ID'));
                $grid->column('productid', __('产品ID'));
                $grid->column('planid', __('计划ID'));
                $grid->column('num', '数量');
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSellcontractJiaofu());
                $form->text('customerid', __('客户ID'))
                ->creationRules('required|max:200|unique:cmf_sellcontract_jiaofu',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('hetongid', __('合同ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('productid', __('产品ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('planid', __('计划ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('num', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('jieshouren', __('接收人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('jiaofudate', __('交付日期'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('beiyong1', __('备用一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong2', __('备用二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong3', __('备用三'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('销售合同交付');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('销售合同交付')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSellcontractJiaofu());
        return $content
            ->header('销售合同交付')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSellcontractJiaofu::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('customerid', __('客户ID'));
        $show->field('hetongid', __('合同ID'));
        $show->field('productid', __('产品ID'));
        $show->field('planid', __('计划ID'));
        $show->field('num', __('数量'));
        $show->field('price', __('价格'));
        $show->field('jieshouren', __('接收人'));
        $show->field('jiaofudate', __('交付日期'));
        $show->field('beizhu', __('备注'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('beiyong1', __('备用一'));
        $show->field('beiyong2', __('备用二'));
        $show->field('beiyong3', __('备用三'));
        $show->field('jine', __('金额'));
        return $show;
        }
}

?>