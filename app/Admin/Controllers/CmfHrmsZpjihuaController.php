<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsZpjihua;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsZpjihuaController extends AdminController {

	protected $title = "招聘计划";

    public function index(Content $content)
    {
        return $content
            ->header('招聘计划')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsZpjihua());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('departName', __('用工部门'));
                $grid->column('startTime', __('开始时间'));
                $grid->column('endTime', __('结束时间'));
                $grid->column('applyMan', __('申请人'));
                $grid->column('applyTime', '申请时间');
                $grid->column('exMan', __('审核人'));
                $grid->column('exTime', __('审核时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsZpjihua());
                $form->text('Name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_hrms_zpjihua',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->radio('sex', __('性别'))->options(['1' => '男','0' => '女'])
                ->rules('required');
                $form->text('need', __('需求'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('personNumber', __('个人号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('startTime', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('endTime', __('结束时间'))
                ->rules('required');
                $form->text('applyMan', __('申请人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('applyTime', __('申请时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('exMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('exTime', __('审核时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('exStatus', __('审核状态'))->options(['1' => '已审核','0' => '未审核'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('招聘计划');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('招聘计划')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsZpjihua());
        return $content
            ->header('招聘计划')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsZpjihua::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('moduleId', __('模块编号'));
        $show->field('moduleName', __('模块名称'));
        $show->field('modulePosition', __('模块位置'));
        $show->field('moduleAttr', __('模块属性'));
        $show->field('displayLineNumber', __('显示行号'));
        $show->field('scrollDisplay', __('是否滚动显示'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>