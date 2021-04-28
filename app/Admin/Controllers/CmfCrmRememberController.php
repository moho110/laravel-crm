<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmRemember;
use App\Models\CmfLinkman;
use App\Models\CmfCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmRememberController extends AdminController {

	protected $title = "纪念日";

    public function index(Content $content)
    {
        return $content
            ->header('纪念日')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmRemember());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('linkmanname', __('联系人ID'))->display(function (){
                    return $this->CmfLinkman['linkmanname'];});
                $grid->column('mem_type', __('纪念日类型'));
                $grid->column('mem_date', __('纪念日日期'));
                $grid->column('createtime', __('创建时间'));
                $grid->column('operman', '操作人');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmRemember());
                $form->select('linkmanid', __('联系人ID'))
                ->options(CmfLinkman::pluck('linkmanname','id'))
                ->creationRules('required|max:200|unique:cmf_crm_remember',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('mem_type', __('纪念日类型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('mem_date', __('纪念日日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('operman', __('操作人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('纪念日');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('纪念日')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmRemember());
        return $content
            ->header('纪念日')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmRemember::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('linkmanname', __('联系人ID'))->as(function ($CmfLinkman) {
                return $this->CmfLinkman['linkmanname'];
            });
        $show->field('mem_type', __('纪念日类型'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('mem_date', __('纪念日日期'));
        $show->field('createtime', __('创建时间'));
        $show->field('operman', __('操作人'));
        return $show;
        }
}

?>