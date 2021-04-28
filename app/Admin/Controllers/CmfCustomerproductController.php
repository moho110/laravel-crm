<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomerproduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCustomerproductController extends AdminController {

	protected $title = "产品列表";

    public function index(Content $content)
    {
        return $content
            ->header('产品列表')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCustomerproduct());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('priceMan', __('报价人'));
                $grid->column('clients', __('客户'));
                $grid->column('reiceiver', __('接收人'));
                $grid->column('priceTime', __('报价时间'));
                $grid->column('count', '金额');
                $grid->column('isExamine', '是否审核')
                    ->display(function ($isExamine) {
                        return $isExamine ? '是' : '否';
                    });
                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCustomerproduct());
                $form->text('theme', __('主题'))
                ->creationRules('required|max:200|unique:cmf_customerproduct',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('priceMan', __('报价人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('clients', __('客户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('reiceiver', __('接收人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('priceTime', __('报价时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->currency('count', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('saleChance', __('销售机会'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('jiaofuIntro', __('交付介绍'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('toPayIntro', __('支付介绍'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('packageExpIntro', __('打包介绍'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('attach', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('isExamine', __('是否审核'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('examineMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('examineTime', __('审核时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('unitid', __('单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('产品列表');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('产品列表')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCustomerproduct());
        return $content
            ->header('产品列表')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCustomerproduct::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('theme', __('主题'));
        $show->field('priceMan', __('报价人'));
        $show->field('clients', __('客户'));
        $show->field('reiceiver', __('接收人'));
        $show->field('priceTime', __('报价时间'));
        $show->field('count', __('金额'));
        $show->field('saleChance', __('销售机会'));
        $show->field('jiaofuIntro', __('交付介绍'));
        $show->field('toPayIntro', __('支付介绍'));
        $show->field('packageExpIntro', __('打包介绍'));
        $show->field('memo', __('备注'));
        $show->field('attach', __('附件'));
        $show->field('isExamine', __('是否审核'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('examineMan', __('审核人'));
        $show->field('examineTime', __('审核时间'));
        $show->field('unitid', __('单位'));
        return $show;
        }
}

?>