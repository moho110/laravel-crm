<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomer;
use App\Models\CmfSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCustomerController extends AdminController {

	protected $title = "客户";

    public function index(Content $content)
    {
        return $content
            ->header('客户')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCustomer());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('供应商名称'))->display(function (){
                    return $this->CmfSupply['supplyname'];});
                $grid->column('supplyshortname', __('简称'));
                $grid->column('state', __('状态'));
                $grid->column('fax', '传真号码');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCustomer());
                $form->select('supplyid', __('供应商ID'))
                ->options(CmfSupply::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_customer',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('supplyname', __('供应商名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplyshortname', __('供应商简称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('enterstype', __('输入类型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('calling', __('称呼'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('state', __('状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('membercard', __('会员卡'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chargesection', __('充电段'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('postalcode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->mobile('phone', __('电话号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->mobile('fax', __('传真号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('contactaddress', __('联系地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->email('email', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('netword', __('网络用词'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('bank', __('银行'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('accountnumber', __('帐户号码'))
                ->creationRules('required|max:200|integer',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('startdate', __('开始日期'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('enddate', __('结束日期'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('style', __('类型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->number('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplycn', __('供应编号'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('sysuser', __('系统用户'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('explainStr', __('Str字串'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('briefStr', __('简称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('prodprice', __('产品报价'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('amtagio', __('amtagio'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('remark', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('recommand', __('推荐'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('getaccount', __('获取帐户'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('yuchuzhi', __('预支出'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('factgetmoney', __('实际获取金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('nogetmoney', __('未获取金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('origin', __('来源'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('salemode', __('销售模式'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('property', __('属性'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('datascope', __('数据范围'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('createdate', __('创建日期'))
                ->creationRules('required',
                        ['requied' => '此项不能为空']);
                $form->number('integral', __('数值'))
                ->creationRules('required|max:10',
                        ['requied' => '此项不能为空','max' =>'不能大于10个字符']);
                $form->datetime('lasttracetime', __('最后跟踪时间'))
                ->creationRules('required',
                        ['requied' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('客户');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('客户')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCustomer());
        return $content
            ->header('客户')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCustomer::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyid', __('供应商ID'));
        $show->field('supplyname', __('供应商名称'));
        $show->field('supplyshortname', __('供应商简称'));
        $show->field('enterstype', __('输入类型'));
        $show->field('calling', __('称呼'));
        $show->field('state', __('状态'));
        $show->field('membercard', __('会员卡'));
        $show->field('chargesection', __('充电段'));
        $show->field('postalcode', __('邮政编码'));
        $show->field('phone', __('电话号码'));
        $show->field('fax', __('传真号码'));
        $show->field('contactaddress', __('联系地址'));
        $show->field('email', __('电子邮件'));
        $show->field('netword', __('网络用词'));
        $show->field('bank', __('银行'));
        $show->field('accountnumber', __('帐户号码'));
        $show->field('startdate', __('开始日期'));
        $show->field('enddate', __('结束日期'));
        $show->field('style', __('类型'));
        $show->field('user_flag', __('用户标识'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplycn', __('供应编号'));
        $show->field('sysuser', __('系统用户'));
        $show->field('explainStr', __('Str字串'));
        $show->field('briefStr', __('简称'));
        $show->field('prodprice', __('产品报价'));
        $show->field('amtagio', __('amtagio'));
        $show->field('remark', __('备注'));
        $show->field('recommand', __('推荐'));
        $show->field('getaccount', __('获取帐户'));
        $show->field('yuchuzhi', __('预支出'));
        $show->field('factgetmoney', __('实际获取金额'));
        $show->field('nogetmoney', __('未获取金额'));
        $show->field('origin', __('来源'));
        $show->field('salemode', __('销售模式'));
        $show->field('property', __('属性'));
        $show->field('datascope', __('数据范围'));
        $show->field('createdate', __('创建日期'));
        $show->field('integral', __('事务'));
        $show->field('lasttracetime', __('最后跟踪时间'));
        return $show;
        }
}

?>