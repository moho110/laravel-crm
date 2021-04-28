<?php

namespace App\Admin\Controllers;

use App\Models\CmfSellplanmain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSellplanmainController extends AdminController {

	protected $title = "采购计划";

    public function index(Content $content)
    {
        return $content
            ->header('采购计划')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSellplanmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('user_id', __('用户ID'));
                $grid->column('supplyid', __('供应商ID'));
                $grid->column('chanceid', __('机会ID'));
                $grid->column('totalmoney', '总金额');
                $grid->column('ifpay', '是否支付')
                    ->display(function ($ifpay) {
                        return $ifpay ? '是' : '否';
                    });
                
                $grid->column('linkman', __('联系人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSellplanmain());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_sellplanmain',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplyid', __('供应商ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chanceid', __('机会ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('sellplanno', __('采购计划编号'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('paytype', __('支付类型'))->options(['1' => '线下支付','0' => '线上支付'])
                ->rules('required');
                $form->currency('huikuanjine', __('汇款金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('fahuojine', __('发货金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('kaipiaojine', __('开票金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('plandate', __('计划日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->date('zuiwanfahuodate', __('最晚发货日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('qianyueren', __('签约人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fileaddress', __('文件地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('fahuostate', __('发货状态'))->options(['1' => '已发货','0' => '未发货'])
                ->rules('required');
                $form->textarea('gaiyao', __('概要'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('storeid', __('仓库ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('linkman', __('联系人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('address', __('地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('mobile', __('移动电话'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->radio('billtype', __('清单类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('ifpay', __('是否支付'))->options(['1' => '已支付','0' => '未支付'])
                ->rules('required');
                $form->textarea('beiyong', __('备用'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('kaipiaostate', __('开票状态'))->options(['1' => '已开票','0' => '未开票'])
                ->rules('required');
                $form->textarea('fapiaoneirong', __('发票内容'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fapiaotype', __('发票类型'))->options(['1' => '普通发票','0' => '增值税发票'])
                ->rules('required');
                $form->text('fapiaono', __('发票编号'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fahuotype', __('发货类型'))->options(['1' => '普通车辆','0' => '特殊车辆'])
                ->rules('required');
                $form->text('fahuodan', __('发货单'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('fahuoyunfei', __('发货运费'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('yunfeitype', __('运费类型'))->options(['1' => '普通运费','0' => '特殊运费'])
                ->rules('required');
                $form->textarea('oddment', __('零碎业务'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('integral', __('integral'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('采购计划');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('采购计划')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSellplanmain());
        return $content
            ->header('采购计划')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSellplanmain::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplyid', __('供应商ID'));
        $show->field('chanceid', __('机会ID'));
        $show->field('sellplanno', __('采购计划编号'));
        $show->field('totalmoney', __('总金额'));
        $show->field('paytype', __('支付类型'));
        $show->field('huikuanjine', __('汇款金额'));
        $show->field('fahuojine', __('发货金额'));
        $show->field('kaipiaojine', __('开票金额'));
        $show->field('plandate', __('计划日期'));
        $show->field('zuiwanfahuodate', __('最晚发货日期'));
        $show->field('qianyueren', __('签约人'));
        $show->field('user_flag', __('用户标识'));
        $show->field('beizhu', __('备注'));
        $show->field('fileaddress', __('文件地址'));
        $show->field('fahuostate', __('发货状态'));
        $show->field('gaiyao', __('概要'));
        $show->field('storeid', __('仓库ID'));
        $show->field('linkman', __('联系人'));
        $show->field('address', __('地址'));
        $show->field('mobile', __('移动电话'));
        $show->field('createtime', __('创建时间'));
        $show->field('billtype', __('清单类型'));
        $show->field('ifpay', __('是否支付'));
        $show->field('beiyong', __('备用'));
        $show->field('kaipiaostate', __('开票状态'));
        $show->field('fapiaoneirong', __('发票内容'));
        $show->field('fapiaotype', __('发票类型'));
        $show->field('fapiaono', __('发票编号'));
        $show->field('fahuotype', __('发货类型'));
        $show->field('fahuodan', __('发货单'));
        $show->field('fahuoyunfei', __('发货运费'));
        $show->field('yunfeitype', __('运费类型'));
        $show->field('oddment', __('零碎业务'));
        $show->field('integral', __('integral'));
        return $show;
        }
}

?>