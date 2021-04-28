<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmShenqingbaobei;
use App\Models\CmfCustomer;
use App\Models\CmfCrmChance;
use App\Models\CmfLinkman;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmShenqingbaobeiController extends AdminController {

	protected $title = "申请报备";

    public function index(Content $content)
    {
        return $content
            ->header('申请报备')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmShenqingbaobei());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('linkmanname', __('联系人ID'))->display(function (){
                    return $this->CmfLinkman['linkmanname'];});
                $grid->column('chanceTheme', __('机会ID'))->display(function (){
                    return $this->CmfCrmChance['chanceTheme'];});
                $grid->column('fujian', __('附件'));
                $grid->column('createman',__('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmShenqingbaobei());
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_crm_shenqingbaobei',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('linkmanid', __('联系人ID'))
                ->options(CmfLinkman::pluck('linkmanname','id'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('chanceid', __('机会ID'))
                ->options(CmfCrmChance::pluck('chanceTheme','id'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('introduce', __('介绍'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('zhichi', __('支持'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fujian', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '不好'])
                ->rules('required');
                $form->textarea('piyu', __('批阅'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('shenheman', __('审核人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('shenhetime', __('审核时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('zhuti', __('主题'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('tixingren', __('提醒人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('申请报备');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('申请报备')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmShenqingbaobei());
        return $content
            ->header('申请报备')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmShenqingbaobei::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('linkmanname', __('联系人ID'))->as(function ($CmfLinkman) {
                return $this->CmfLinkman['linkmanname'];
            });
        $show->field('chanceTheme', __('机会ID'))->as(function ($CmfCrmChance) {
                return $this->CmfCrmChance['chanceTheme'];
            });
        $show->field('introduce', __('介绍'));
        $show->field('zhichi', __('支持'));
        $show->field('fujian', __('附件'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('state', __('状态'));
        $show->field('piyu', __('批阅'));
        $show->field('shenheman', __('审核人'));
        $show->field('shenhetime', __('审核时间'));
        $show->field('zhuti', __('主题'));
        $show->field('tixingren', __('提醒人'));
        return $show;
        }
}

?>