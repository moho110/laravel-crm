<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengPaiban;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengPaibanController extends AdminController {

	protected $title = "行政排班";

    public function index(Content $content)
    {
        return $content
            ->header('行政排班')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengPaiban());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('termName', __('模块编号'));
                $grid->column('kaoqinDate', __('模块名称'));                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengPaiban());
                $form->text('termName', __('学期名称'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_paiban',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->number('week', __('周次'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('day', __('日期'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('kaoqinDate', __('考勤日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('className', __('班次名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('paipanPerson', __('排班人员'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政排班');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政排班')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengPaiban());
        return $content
            ->header('行政排班')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengPaiban::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('termName', __('学期名称'));
        $show->field('week', __('周次'));
        $show->field('day', __('日期'));
        $show->field('kaoqinDate', __('考勤日期'));
        $show->field('className', __('班次名称'));
        $show->field('paipanPerson', __('排班人员'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>