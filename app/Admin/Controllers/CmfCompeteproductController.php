<?php

namespace App\Admin\Controllers;

use App\Models\CmfCompeteproduct;
use App\Models\CmfCustomer;
use App\Models\CmfProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCompeteproductController extends AdminController {

	protected $title = "竞争对手";

    public function index(Content $content)
    {
        return $content
            ->header('竞争对手')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCompeteproduct());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('user_id', __('用户ID'));
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('productname', __('产品ID'))->display(function (){
                    return $this->CmfProduct['productname'];});
                $grid->column('compname', __('竞争对手名称'));
                $grid->column('createtime', '创建时间');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCompeteproduct());
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200|unique:cmf_competeproduct',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('productid', __('产品ID'))
                ->options(CmfProduct::pluck('productname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('infofrom', __('信息'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('comproduct', __('竞争产品'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('compname', __('竞争对手名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('compexcel', __('竞争表'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('compdefect', __('防御'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('compprice', __('竞争价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('fileaddress', __('文件地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('竞争对手');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('竞争对手')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCompeteproduct());
        return $content
            ->header('竞争对手')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCompeteproduct::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('productname', __('产品ID'))->as(function ($CmfProduct) {
                return $this->CmfProduct['productname'];
            });
        $show->field('infofrom', __('信息'));
        $show->field('comproduct', __('竞争产品'));
        $show->field('compname', __('竞争对手名称'));
        $show->field('compexcel', __('竞争表'));
        $show->field('compdefect', __('防御'));
        $show->field('compprice', __('竞争价格'));
        $show->field('user_flag', __('用户标识'));
        $show->field('fileaddress', __('文件地址'));
        $show->field('createtime', __('创建时间'));
        return $show;
        }
}

?>