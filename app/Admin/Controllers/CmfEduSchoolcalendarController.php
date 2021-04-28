<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduSchoolcalendar;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduSchoolcalendarController extends AdminController {

	protected $title = "校历";

    public function index(Content $content)
    {
        return $content
            ->header('校历')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduSchoolcalendar());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('holiday', __('节假日'));
                $grid->column('startTime', __('开始时间'));
                $grid->column('endTime', __('结束时间'));
                $grid->column('term', __('学期'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduSchoolcalendar());
                $form->text('holiday', __('假期'))
                ->creationRules('required|max:200|unique:cmf_edu_schoolcalendar',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->datetime('startTime', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('endTime', __('结束时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('term', __('学期'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('校历');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('校历')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduSchoolcalendar());
        return $content
            ->header('校历')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduSchoolcalendar::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('holiday', __('假期'));
        $show->field('startTime', __('开始时间'));
        $show->field('endTime', __('结束时间'));
        $show->field('term', __('学期'));
        return $show;
        }
}

?>