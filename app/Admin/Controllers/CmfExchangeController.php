<?php

namespace App\Admin\Controllers;

use App\Models\CmfExchange;
use App\Models\CmfCustomer;
use App\Models\CmfProduct;
use App\Models\CmfStore;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfExchangeController extends AdminController {

	protected $title = "积分兑换";

    public function index(Content $content)
    {
        return $content
            ->header('积分兑换')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfExchange());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('productname', __('产品ID'))->display(function (){
                    return $this->CmfProduct['productname'];});
                $grid->column('xinghao', __('产品型号'));
                $grid->column('guige', __('产品规格'));
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfExchange());
                $form->select('customid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_exchange',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('prodid', __('产品ID'))
                ->options(CmfProduct::pluck('productname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('xinghao', __('产品型号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('guige', __('产品规格'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('integral', __('integral'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodname', __('产品名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('exchangenum', __('积分兑换数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('stockid', __('库存ID'))
                ->options(CmfStore::pluck('prodid','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('积分兑换');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('积分兑换')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfExchange());
        return $content
            ->header('积分兑换')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfExchange::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('customid', __('客户ID'));
        $show->field('prodid', __('产品ID'));
        $show->field('xinghao', __('产品型号'));
        $show->field('guige', __('产品规格'));
        $show->field('integral', __('integral'));
        $show->field('createtime', __('创建时间'));
        $show->field('createman', __('创建人'));
        $show->field('prodname', __('产品名称'));
        $show->field('exchangenum', __('积分兑换数量'));
        $show->field('stockid', __('库存ID'));
        $show->field('beizhu', __('备注'));
        return $show;
        }
}

?>