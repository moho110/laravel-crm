<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmContact;
use App\Models\CmfLinkman;
use App\Models\CmfCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmContactController extends AdminController {

	protected $title = "联系方式";

    public function index(Content $content)
    {
        return $content
            ->header('联系方式')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmContact());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('linkmanname', __('联系人ID'))->display(function (){
                    return $this->CmfLinkman['linkmanname'];});
                $grid->column('user_id', __('用户ID'));
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', '创建时间');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmContact());
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_crm_contact',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('linkmanid', __('联系人ID'))
                ->options(CmfLinkman::pluck('linkmanname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('contact', __('联系方式'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->radio('chance', __('机会'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('stage', __('阶段'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('describes', __('描述'))
                ->creationRules('required|max:200', 
                        ['required' => '创建时间不能为空', 'max' => '不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('contacttime', __('合同时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('nextcontacttime', __('下次合同时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('nextissue', __('下次讨论'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('alreadycontact', __('已完成合同'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('public', __('公共'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('priority', __('优先级'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('联系方式');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('联系方式')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmContact());
        return $content
            ->header('联系方式')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmContact::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('linkmanname', __('联系人ID'))->as(function ($CmfLinkman) {
                return $this->CmfLinkman['linkmanname'];
            });
        $show->field('user_id', __('用户ID'));
        $show->field('createman', __('创建人'));
        $show->field('contact', __('联系方式'));
        $show->field('chance', __('机会'));
        $show->field('stage', __('阶段'));
        $show->field('describes', __('描述'));
        $show->field('createtime', __('创建时间'));
        $show->field('contacttime', __('合同时间'));
        $show->field('nextcontacttime', __('下次合同时间'));
        $show->field('nextissue', __('下次讨论'));
        $show->field('alreadycontact', __('已完成合同'));
        $show->field('public', __('公共'));
        $show->field('priority', __('优先级'));
        return $show;
        }
}

?>