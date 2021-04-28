<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduZhongcengrenyuan;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduZhongcengrenyuanController extends AdminController {

	protected $title = "中层干部被评人员明细";

    public function index(Content $content)
    {
        return $content
            ->header('中层干部被评人员明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduZhongcengrenyuan());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('testName', __('测试名称'));
                $grid->column('staff', __('职位'));
                $grid->column('uit', __('单位'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduZhongcengrenyuan());
                $form->text('testName', __('测评名称'))
                ->creationRules('required|max:200|unique:cmf_edu_zhongcengrenyuan',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('testManBy', __('被评人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('uit', __('单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staff', __('职务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('pindeDesp', __('品德描述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('pindeSelf', __('品德自述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('abillityDesp', __('能力描述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('abillitySelf', __('能力自述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('studyDesp', __('勤奋描述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('studySelf', __('勤奋自述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('jixiaoDesp', __('绩效描述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('jixiaoSelf', __('绩效自述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('lianzhengDesp', __('廉政描述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('lianzhengSelf', __('廉政自述'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('attach', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('中层干部被评人员明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('中层干部被评人员明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduZhongcengrenyuan());
        return $content
            ->header('中层干部被评人员明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduZhongcengrenyuan::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('testName', __('测评名称'));
        $show->field('testManBy', __('被评人员'));
        $show->field('uit', __('单位'));
        $show->field('staff', __('职务'));
        $show->field('pindeDesp', __('品德描述'));
        $show->field('pindeSelf', __('品德自述'));
        $show->field('abillityDesp', __('能力描述'));
        $show->field('abillitySelf', __('能力自述'));
        $show->field('studyDesp', __('勤奋描述'));
        $show->field('studySelf', __('勤奋自述'));
        $show->field('jixiaoDesp', __('绩效描述'));
        $show->field('jixiaoSelf', __('绩效自述'));
        $show->field('lianzhengDesp', __('廉政描述'));
        $show->field('lianzhengSelf', __('廉政自述'));
        $show->field('attach', __('附件'));
        return $show;
        }
}

?>