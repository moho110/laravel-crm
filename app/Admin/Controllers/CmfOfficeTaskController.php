<?php

namespace App\Admin\Controllers;

use App\Models\CmfOfficeTask;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfOfficeTaskController extends AdminController {

	protected $title = "办公任务";

    public function index(Content $content)
    {
        return $content
            ->header('办公任务')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfOfficeTask());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('TASK_TYPE', __('任务类型'));
                $grid->column('EXEC_TIME', __('执行时间'));
                $grid->column('TASK_URL', __('任务URL'));
                $grid->column('TASK_NAME', __('任务名称'));
                $grid->column('TASK_CODE', '任务代码');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfOfficeTask());
                $form->number('TASK_TYPE', __('任务类型'))
                ->creationRules('required|max:200|unique:cmf_office_task',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('INTERVAL', __('时间'))
                ->creationRules('required|max:2',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->time('EXEC_TIME', __('执行时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->date('LAST_EXEC', __('最后执行'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('TASK_URL', __('任务URL'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('TASK_NAME', __('任务名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('TASK_DESC', __('任务描述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('TASK_CODE', __('任务代码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('USE_FLAG', __('使用标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('SYS_TASK', __('系统任务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('办公任务');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('办公任务')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfOfficeTask());
        return $content
            ->header('办公任务')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfOfficeTask::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('TASK_TYPE', __('任务类型'));
        $show->field('INTERVAL', __('时间'));
        $show->field('EXEC_TIME', __('执行时间'));
        $show->field('LAST_EXEC', __('最后执行'));
        $show->field('TASK_URL', __('任务URL'));
        $show->field('TASK_NAME', __('任务名称'));
        $show->field('TASK_DESC', __('任务描述'));
        $show->field('TASK_CODE', __('任务代码'));
        $show->field('USE_FLAG', __('使用标识'));
        $show->field('SYS_TASK', __('系统任务'));
        return $show;
        }
}

?>