<?php

namespace App\Admin\Controllers;

use App\Models\CmfSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSupplyController extends AdminController {

	protected $title = "供应商";

    public function index(Content $content)
    {
        return $content
            ->header('供应商')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSupply());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyid', __('供应商ID'));
                $grid->column('supplyname', __('供应商名称'));
                $grid->column('supplyshortname', __('简称'));
                $grid->column('linkman', __('联系人'));
                $grid->column('postalcode', '邮政编码');
                $grid->column('phone', __('电话号码'));
                $grid->column('email', __('电子邮件'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSupply());
                $form->text('supplyid', __('供应商ID'))
                ->creationRules('required|max:200|unique:cmf_supply',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('supplyname', __('供应商名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplyshortname', __('简称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('enterstype', __('输入类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('calling', __('职业'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('linkman', __('联系人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('artificialperson', __('法人代表'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chargesection', __('段'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('postalcode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('phone', __('电话号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('fax', __('传真号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('contactaddress', __('联系地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('email', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('netword', __('网络用语'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('bank', __('银行'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('accountnumber', __('银行帐号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('startdate', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('enddate', __('结束时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('style', __('类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplycn', __('供应商编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('sysuser', __('系统用户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodtype', __('产品类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('amtagio', __('amtagio'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('remark', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('recommand', __('推荐'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('payaccount', __('支付帐户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('paymoney', __('支付金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('factpaymoney', __('实际支付金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('nopaymoney', __('未支付金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('datascope', __('数据范围'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('yufukuan', __('预付款'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('供应商');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('供应商')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSupply());
        return $content
            ->header('供应商')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSupply::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyid', __('供应商ID'));
        $show->field('supplyname', __('供应商名称'));
        $show->field('supplyshortname', __('简称'));
        $show->field('enterstype', __('输入类型'));
        $show->field('calling', __('职业'));
        $show->field('linkman', __('联系人'));
        $show->field('artificialperson', __('法人代表'));
        $show->field('chargesection', __('段'));
        $show->field('postalcode', __('邮政编码'));
        $show->field('phone', __('电话号码'));
        $show->field('fax', __('传真号码'));
        $show->field('contactaddress', __('联系地址'));
        $show->field('email', __('电子邮件'));
        $show->field('netword', __('网络用语'));
        $show->field('bank', __('银行'));
        $show->field('accountnumber', __('银行帐号'));
        $show->field('startdate', __('开始时间'));
        $show->field('enddate', __('结束时间'));
        $show->field('style', __('类型'));
        $show->field('user_flag', __('用户标识'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplycn', __('供应商编码'));
        $show->field('sysuser', __('系统用户'));
        $show->field('prodtype', __('产品类型'));
        $show->field('amtagio', __('amtagio'));
        $show->field('remark', __('备注'));
        $show->field('recommand', __('推荐'));
        $show->field('payaccount', __('支付帐户'));
        $show->field('paymoney', __('支付金额'));
        $show->field('factpaymoney', __('实际支付金额'));
        $show->field('nopaymoney', __('未支付金额'));
        $show->field('datascope', __('数据范围'));
        $show->field('yufukuan', __('预付款'));
        return $show;
        }
}

?>