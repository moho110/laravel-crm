<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsWorkerZhicheng;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsWorkerZhichengController extends AdminController {

	protected $title = "工作人员职称";

    public function index(Content $content)
    {
        return $content
            ->header('工作人员职称')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsWorkerZhicheng());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workId', __('工号'));
                $grid->column('name', __('名称'));
                $grid->column('staffName', __('职位'));
                $grid->column('agency', __('机构'));
                $grid->column('inDepartment', '所在部门');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsWorkerZhicheng());
                $form->text('workId', __('工号'))
                ->creationRules('required|max:200|unique:cmf_hrms_worker_zhicheng',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staffName', __('职位名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('getTime', __('获取时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('agency', __('机构'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('工作人员职称');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('工作人员职称')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsWorkerZhicheng());
        return $content
            ->header('工作人员职称')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsWorkerZhicheng::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('workId', __('工号'));
        $show->field('name', __('名称'));
        $show->field('staffName', __('职位名称'));
        $show->field('getTime', __('获取时间'));
        $show->field('agency', __('机构'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>