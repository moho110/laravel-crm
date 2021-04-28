<?php

namespace App\Admin\Controllers;

use App\Models\CmfCrmChance;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCrmChanceController extends AdminController {

	protected $title = "销售机会";

    public function index(Content $content)
    {
        return $content
            ->header('销售机会')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCrmChance());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('chanceTheme', __('机会主题'));
                $grid->column('clientName', __('客户名称'));
                $grid->column('linkMan', __('联系人'));
                $grid->column('findTime', __('发现时间'));
                $grid->column('preCount', '预计金额');
                $grid->column('enable', '可能性')
                    ->display(function ($scrollDisplay) {
                        return $scrollDisplay ? '是' : '否';
                    });
                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCrmChance());
                $form->text('chanceTheme', __('机会主题'))
                ->creationRules('required|max:200|unique:cmf_crm_chance',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('clientName', __('客户名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('linkMan', __('联系人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('findTime', __('发现时间'))
                ->creationRules('required');
                $form->text('clientNeed', __('客户需求'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('preSignTime', __('登陆时间'))
                ->creationRules('required');
                $form->currency('preCount', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('enable', __('可能性'))->options(['1' =>'是','0' =>'否'])
                ->rules('required');
                $form->radio('recentStatus', __('最近状态'))->options(['1' =>'良好','0' =>'一般'])
                ->rules('required');
                $form->radio('status', __('状态'))->options(['1' =>'是','0' =>'否'])
                ->rules('required');
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required');
                $form->textarea('bak', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('lastContactTime', __('最终合同时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->multipleFile('attach', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('销售机会');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('销售机会')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCrmChance());
        return $content
            ->header('销售机会')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCrmChance::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('chanceTheme', __('机会主题'));
        $show->field('clientName', __('客户名称'));
        $show->field('linkMan', __('联系人'));
        $show->field('findTime', __('发现时间'));
        $show->field('clientNeed', __('客户需求'));
        $show->field('preSignTime', __('登陆时间'));
        $show->field('preCount', __('金额'));
        $show->field('enable', __('可能性'));
        $show->field('recentStatus', __('最近状态'));
        $show->field('status', __('状态'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('bak', __('备注'));
        $show->field('lastContactTime', __('最终合同时间'));
        $show->field('attach', __('附件'));
        return $show;
        }
}

?>