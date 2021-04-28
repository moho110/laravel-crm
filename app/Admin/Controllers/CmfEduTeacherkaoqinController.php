<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduTeacherkaoqin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduTeacherkaoqinController extends AdminController {

	protected $title = "教师考勤";

    public function index(Content $content)
    {
        return $content
            ->header('教师考勤')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduTeacherkaoqin());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('teacherUserName', __('教师用户名'));
                $grid->column('teacherName', __('教师姓名'));
                $grid->column('dutyDate', __('考勤日期'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduTeacherkaoqin());
                $form->text('teacherUserName', __('教师用户名'))
                ->creationRules('required|max:200|unique:cmf_edu_teacherkaoqin',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('teacherName', __('教师姓名'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('dutyDate', __('考勤日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('cardTime', __('打卡时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('dutyId', __('考勤ID'))
                ->creationRules('required|max:200|unique:cmf_edu_teacherkaoqin',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('dutyPosition', __('考勤位置'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->ip('dutyIP', __('考勤IP'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('教师考勤');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('教师考勤')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduTeacherkaoqin());
        return $content
            ->header('教师考勤')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduTeacherkaoqin::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('teacherUserName', __('教师用户名'));
        $show->field('teacherName', __('教师姓名'));
        $show->field('dutyDate', __('考勤日期'));
        $show->field('cardTime', __('打卡时间'));
        $show->field('dutyId', __('考勤ID'));
        $show->field('dutyPosition', __('考勤位置'));
        $show->field('dutyIP', __('考勤IP'));
        return $show;
        }
}

?>