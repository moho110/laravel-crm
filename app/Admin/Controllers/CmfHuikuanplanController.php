<?php

namespace App\Admin\Controllers;

use App\Models\CmfHuikuanplan;
use App\Models\CmfCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHuikuanplanController extends AdminController {

	protected $title = "汇款计划";

    public function index(Content $content)
    {
        return $content
            ->header('汇款计划')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHuikuanplan());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('dingdanbillid', __('订单清单ID'));
                $grid->column('plandate', __('计划日期'));
                $grid->column('jine', __('金额'));
                $grid->column('ifpay', '是否滚动显示')
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
                $form = new Form(new CmfHuikuanplan());
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_huikuanplan',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('dingdanbillid', __('订单清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('plandate', __('计划日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('qici', __('期次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('ifpay', __('是否支付'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('billtype', __('清单类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('汇款计划');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('汇款计划')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHuikuanplan());
        return $content
            ->header('汇款计划')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHuikuanplan::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('dingdanbillid', __('订单清单ID'));
        $show->field('plandate', __('计划日期'));
        $show->field('qici', __('期次'));
        $show->field('jine', __('金额'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('ifpay', __('是否支付'));
        $show->field('billtype', __('清单类型'));
        return $show;
        }
}

?>