<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmFeiyongSq;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmFeiyongSqController extends AdminController {

	protected $title = "我的桌面";

    public function index(Content $content)
    {
        return $content
            ->header('我的桌面')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmFeiyongSq());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('feeType', __('费用类型'));
                $grid->column('applyDate', __('申请日期'));
                $grid->column('clientName', __('客户名称'));
                $grid->column('reimburseMan', __('报销人'));
                $grid->column('payTime', '支付时间');
                $grid->column('isExamine', '是否审核')
                    ->display(function ($isExamine) {
                        return $isExamine ? '是' : '否';
                    });
                
                $grid->column('examineMan', __('审核人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmFeiyongSq());
                $form->number('feeType', __('费用类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('count', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('feeUse', __('费用使用'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('applyDate', __('申请日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('clientName', __('客户名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('reimburseMan', __('报销人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('recorder', __('记录员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('isExamine', __('是否审核'))->options(['1' => '是', '0' =>'否'])
                ->rules('required');
                $form->dat('examineDate', __('审核日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('cashier', __('出纳'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('payTime', __('支付时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('bak', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('examineMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('我的桌面');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('我的桌面')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmFeiyongSq());
        return $content
            ->header('我的桌面')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmFeiyongSq::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('feeType', __('费用类型'));
        $show->field('count', __('金额'));
        $show->field('feeUse', __('费用使用'));
        $show->field('applyDate', __('申请日期'));
        $show->field('clientName', __('客户名称'));
        $show->field('reimburseMan', __('报销人'));
        $show->field('recorder', __('记录员'));
        $show->field('isExamine', __('是否审核'));
        $show->field('examineDate', __('审核日期'));
        $show->field('cashier', __('出纳'));
        $show->field('payTime', __('支付时间'));
        $show->field('bak', __('备注'));
        $show->field('examineMan', __('审核日期'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>