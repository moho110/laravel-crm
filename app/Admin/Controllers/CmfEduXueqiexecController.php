<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXueqiexec;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXueqiexecController extends AdminController {

	protected $title = "学期执行";

    public function index(Content $content)
    {
        return $content
            ->header('学期执行')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXueqiexec());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('termName', __('学期名称'));
                $grid->column('startTime', __('开始时间'));
                $grid->column('endTime', __('结束时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXueqiexec());
                $form->number('termName', __('学期名称'))
                ->creationRules('required|max:200|unique:cmf_edu_xueqiexec',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('recentTerm', __('最新学期'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('isMorningHaveClass', __('是否有早课'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('isEveningHaveClass', __('是否有晚课'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('studyYear', __('学年'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('isSatClass', __('是否星期六有课'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('isSunClass', __('是否星期天有课'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->datetime('startTime', __('开始时间'))
                ->creationRules('required', ['required' => '此项不能为空']);
                $form->datetime('endTime', __('结束时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('学期执行');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('学期执行')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXueqiexec());
        return $content
            ->header('学期执行')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXueqiexec::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('termName', __('学期名称'));
        $show->field('recentTerm', __('最新学期'));
        $show->field('isMorningHaveClass', __('是否有早课'));
        $show->field('isEveningHaveClass', __('是否有晚课'));
        $show->field('studyYear', __('学年'));
        $show->field('isSatClass', __('是否星期六有课'));
        $show->field('isSunClass', __('是否星期天有课'));
        $show->field('startTime', __('开始时间'));
        $show->field('endTime', __('结束时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>