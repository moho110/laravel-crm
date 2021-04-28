<?php

namespace App\Admin\Controllers;

use App\Models\CmfWorkplanmain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfWorkplanmainController extends AdminController {

	protected $title = "任务安排";

    public function index(Content $content)
    {
        return $content
            ->header('任务安排')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfWorkplanmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('state', __('状态'));
                $grid->column('begintime', __('开始时间'));
                $grid->column('endtime', __('结束时间'));
                $grid->column('zhixingren', '执行人');
                $grid->column('ifsms', '是否发送短信')
                    ->display(function ($ifsms) {
                        return $ifsms ? '是' : '否';
                    });
                $grid->column('ifemail', '是否发送电子邮件')
                    ->display(function ($ifemail) {
                        return $ifemail ? '是' : '否';
                    });
                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfWorkplanmain());
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200|unique:cmf_workplanmain',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('kind', __('种类'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('begintime', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('endtime', __('结束时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('zhixingren', __('执行人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('finishtime', __('完成时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('shenheren', __('审核人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('shenchastate', __('审查状态'))->options(['1' => '完成','0' => '未完成'])
                ->rules('required');
                $form->datetime('shenhetime', __('审核时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->radio('shenhepishi', __('审核批示'))->options(['1' => '完成','0' => '未完成'])
                ->rules('required');
                $form->textarea('fujian', __('附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifsms', __('是否发送短信'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('ifemail', __('是否发送电子邮件'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('guanlianshiwu', __('关联事务'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('guanlianurl', __('关联URL地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('guanlianid', __('关联ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('lastzhixingtime', __('最终执行时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('任务安排');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('任务安排')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfWorkplanmain());
        return $content
            ->header('任务安排')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfWorkplanmain::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('createtime', __('创建时间'));
        $show->field('createman', __('创建人'));
        $show->field('state', __('状态'));
        $show->field('zhuti', __('主题'));
        $show->field('content', __('内容'));
        $show->field('kind', __('种类'));
        $show->field('begintime', __('开始时间'));
        $show->field('endtime', __('结束时间'));
        $show->field('zhixingren', __('执行人'));
        $show->field('finishtime', __('完成时间'));
        $show->field('shenheren', __('审核人'));
        $show->field('shenchastate', __('审查状态'));
        $show->field('shenhetime', __('审核时间'));
        $show->field('shenhepishi', __('审核批示'));
        $show->field('fujian', __('附件'));
        $show->field('ifsms', __('是否发送短信'));
        $show->field('ifemail', __('是否发送电子邮件'));
        $show->field('guanlianshiwu', __('关联事务'));
        $show->field('guanlianurl', __('关联URL地址'));
        $show->field('guanlianid', __('关联ID'));
        $show->field('lastzhixingtime', __('最终执行时间'));
        return $show;
        }
}

?>