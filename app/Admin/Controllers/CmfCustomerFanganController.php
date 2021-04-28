<?php

namespace App\Admin\Controllers;

use App\Models\CmfCustomerFangan;
use App\Models\CmfCrmChance;
use App\Models\CmfCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCustomerFanganController extends AdminController {

	protected $title = "客户方案";

    public function index(Content $content)
    {
        return $content
            ->header('客户方案')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCustomerFangan());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('chanceTheme', __('机会ID'))->display(function (){
                    return $this->CmfCrmChance['chanceTheme'];});
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', '创建时间');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCustomerFangan());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_customer_fangan',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_customer_fangan',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('chanceid', __('机会ID'))
                ->options(CmfCrmChance::pluck('chanceTheme','id'))
                ->creationRules('required|max:200|unique:cmf_customer_fangan',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fankui', __('反馈'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('fujian', __('附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('客户方案');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('客户方案')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCustomerFangan());
        return $content
            ->header('客户方案')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCustomerFangan::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('chanceTheme', __('机会ID'))->as(function ($CmfCrmChance) {
                return $this->CmfCrmChance['chanceTheme'];
            });
        $show->field('content', __('内容'));
        $show->field('fankui', __('反馈'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('fujian', __('附件'));
        return $show;
        }
}

?>