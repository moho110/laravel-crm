<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengKaoqinbudeng;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengKaoqinbudengController extends AdminController {

	protected $title = "行政考勤补登";

    public function index(Content $content)
    {
        return $content
            ->header('行政考勤补登')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengKaoqinbudeng());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('department', __('部门'));
                $grid->column('person', __('人员'));
                $grid->column('exMan', __('审核人'));
                $grid->column('exTime', __('审核时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengKaoqinbudeng());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_kaoqinbudeng',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('department', __('部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('time', __('时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->date('day', __('日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('class', __('班次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('budengProject', __('补登项目'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('budengStatus', __('补登状态'))->options(['1'=>'良好','0'=>'不好'])
                ->rules('required');
                $form->text('workFlowID', __('工作流ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('exMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('exTime', __('审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('personName', __('人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政考勤补登');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政考勤补登')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengKaoqinbudeng());
        return $content
            ->header('行政考勤补登')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengKaoqinbudeng::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('department', __('部门'));
        $show->field('person', __('人员'));
        $show->field('time', __('时间'));
        $show->field('day', __('日期'));
        $show->field('class', __('班次'));
        $show->field('budengProject', __('补登项目'));
        $show->field('budengStatus', __('补登状态'));
        $show->field('workFlowID', __('工作流ID'));
        $show->field('exMan', __('审核人'));
        $show->field('exTime', __('审核时间'));
        $show->field('personName', __('人员名称'));
        return $show;
        }
}

?>