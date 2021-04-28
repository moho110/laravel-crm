<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengTiaobanxianghu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengTiaobanxianghuController extends AdminController {

	protected $title = "行政调班项目";

    public function index(Content $content)
    {
        return $content
            ->header('行政调班项目')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengTiaobanxianghu());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('exMan', __('审核人'));
                $grid->column('exTime', __('审核时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengTiaobanxianghu());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_tiaobanxianghu',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('oriDepartment', __('原部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('oriPerson', __('原人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('oriStartTime', __('原上班时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('oriStart', __('原上班'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('newDepartment', __('新部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('newCruit', __('新雇员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('newStartTime', __('新上班时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->textarea('newStart', __('新上班'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('exStatus', __('审核状态'))->options(['1' => '良好','0' =>'一般'])
                ->rules('required');
                $form->text('workFlowID', __('工作流ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('exMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('exTime', __('审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('oriPersonName', __('原人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('newPersonName', __('新人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政调班项目');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政调班项目')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengTiaobanxianghu());
        return $content
            ->header('行政调班项目')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengTiaobanxianghu::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('oriDepartment', __('原部门'));
        $show->field('oriPerson', __('原人员'));
        $show->field('oriStartTime', __('原上班时间'));
        $show->field('oriStart', __('原上班'));
        $show->field('newDepartment', __('新部门'));
        $show->field('newCruit', __('新雇员'));
        $show->field('newStartTime', __('新上班时间'));
        $show->field('newStart', __('新上班'));
        $show->field('exStatus', __('审核状态'));
        $show->field('workFlowID', __('工作流ID'));
        $show->field('exMan', __('审核人'));
        $show->field('exTime', __('审核时间'));
        $show->field('oriPersonName', __('原人员名称'));
        $show->field('newPersonName', __('新人员名称'));
        return $show;
        }
}

?>