<?php

namespace App\Admin\Controllers;

use App\Models\CmfBuyplanmain;
use App\Models\CmfSupply;
use App\Models\CmfStore;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfBuyplanmainController extends AdminController {

	protected $title = "采购计划";

    public function index(Content $content)
    {
        return $content
            ->header('采购计划')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfBuyplanmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('linkman', __('联系人'));
                $grid->column('caigoudate', __('采购日期'));
                $grid->column('daohuodate', __('到货日期'));
                $grid->column('totalmoney', '总金额');
                $grid->column('ifpay', '是否支付')
                    ->display(function ($ifpay) {
                        return $ifpay ? '是' : '否';
                    });
                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfBuyplanmain());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_buyplanmain',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('supplyid','供应商名称')
                     ->options(CmfSupply::pluck('supplyname', 'id'))
                     ->rules("required");
                $form->text('linkman', __('联系人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('caigoudate', __('采购日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->select('storeid', __('库存ID'))
                ->options(CmfStore::pluck('prodid','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('daohuodate', __('到货日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('danhao', __('单号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200', 
                        ['required' => '创建时间不能为空','max' => '不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('guanliandingdan', __('关联订单'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('guanliankehu', __('关联客户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong1', __('备用一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong2', __('备用二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong3', __('备用三'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('paymoney', __('支付金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->currency('rukumoney', __('入库金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('shoupiaomoney', __('收票金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifpay', __('是否支付'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('shoupiaostate', __('收票状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->text('oddment', __('零碎'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('accountid', __('帐户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
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
            $form = new Form(new CmfBuyplanmain());
        return $content
            ->header('采购计划')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfBuyplanmain::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('supplyid', __('供应商ID'));
        $show->field('linkman', __('联系人'));
        $show->field('caigoudate', __('采购日期'));
        $show->field('storeid', __('库存ID'));
        $show->field('daohuodate', __('到货日期'));
        $show->field('danhao', __('单号'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('totalmoney', __('总金额'));
        $show->field('guanliandingdan', __('关联订单'));
        $show->field('guanliankehu', __('关联客户'));
        $show->field('beizhu', __('备注'));
        $show->field('beiyong1', __('备用一'));
        $show->field('beiyong2', __('备用二'));
        $show->field('beiyong3', __('备用三'));
        $show->field('paymoney', __('支付金额'));
        $show->field('state', __('状态'));
        $show->field('rukumoney', __('入库金额'));
        $show->field('shoupiaomoney', __('收票金额'));
        $show->field('ifpay', __('是否支付'));
        $show->field('shoupiaostate', __('收票状态'));
        $show->field('oddment', __('零碎'));
        $show->field('user_flag', __('用户标识'));
        $show->field('accountid', __('帐户ID'));
        return $show;
        }
}

?>