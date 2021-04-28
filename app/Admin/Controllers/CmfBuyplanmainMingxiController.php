<?php

namespace App\Admin\Controllers;

use App\Models\CmfBuyplanmainMingxi;
use App\Models\CmfProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfBuyplanmainMingxiController extends AdminController {

	protected $title = "采购单名细";

    public function index(Content $content)
    {
        return $content
            ->header('采购单名细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfBuyplanmainMingxi());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('oldproductid', __('过往产品ID'));
                $grid->column('productname', __('产品ID'))->display(function (){
                    return $this->CmfProduct['productname'];});
                $grid->column('lastprice', __('最终价格'));
                $grid->column('prodname', __('产品名称'));
                $grid->column('num', '产品数量');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfBuyplanmainMingxi());
                $form->number('oldproductid', __('过往产品ID'))
                ->creationRules('required|max:20|unique:cmf_buyplanmain_mingxi',
                        ['required' => '此项不能为空','max' =>'不能大于20个字符','unique' => '数据已经存在']);
                $form->select('prodid', __('产品ID'))
                ->options(CmfProduct::pluck('productname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('lastprice', __('最终价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prodname', __('产品名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('num', __('产品数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('mainrowid', __('主列ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('采购单名细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('采购单名细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfBuyplanmainMingxi());
        return $content
            ->header('采购单名细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfBuyplanmainMingxi::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('oldproductid', __('过往产品ID'));
        $show->field('productname', __('产品ID'))->as(function ($CmfProduct) {
                return $this->CmfProduct['productname'];
            });
        $show->field('lastprice', __('最终价格'));
        $show->field('prodname', __('产品名称'));
        $show->field('num', __('产品数量'));
        $show->field('price', __('产品价格'));
        $show->field('jine', __('金额'));
        $show->field('beizhu', __('备注'));
        $show->field('mainrowid', __('主列ID'));
        return $show;
        }
}

?>