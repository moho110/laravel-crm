<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengBanci;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengBanciController extends AdminController {

	protected $title = "行政班次";

    public function index(Content $content)
    {
        return $content
            ->header('行政班次')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengBanci());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('className', __('班次名称'));
                $grid->column('dutyTime', __('考勤时间'));                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengBanci());
                $form->text('className', __('班次名称'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_banci',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->time('dutyTime', __('考勤时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('isStartTimeEnable', __('是否可能开始时间'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->date('isEndTimeEnable', __('是否可能结束时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->datetime('startCardTime', __('开始考勤时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('endCardTime', __('结束考勤时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('startDelayCardTime', __('开始迟到打卡时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->datetime('endDelayCardTime', __('结束迟到打卡时间'))
                ->creationRules('required', ['required' => '此项不能为空']);
                $form->datetime('laterTime', __('迟到时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('earlyTime', __('早退时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('classManageOne', __('班次管理一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('classManageTwo', __('班次管理二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政班次');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政班次')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengBanci());
        return $content
            ->header('行政班次')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengBanci::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('className', __('班次名称'));
        $show->field('dutyTime', __('考勤时间'));
        $show->field('isStartTimeEnable', __('是否可能开始时间'));
        $show->field('isEndTimeEnable', __('是否可能结束时间'));
        $show->field('startCardTime', __('开始迟到打卡时间'));
        $show->field('endCardTime', __('结束迟到打卡时间'));
        $show->field('startDelayCardTime', __('开始迟到打卡时间'));
        $show->field('endDelayCardTime', __('结束迟到打卡时间'));
        $show->field('laterTime', __('迟到时间'));
        return $show;
        }
}

?>