<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengYearcheck;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengYearcheckController extends AdminController {

	protected $title = "行政人员年度考核量化表";

    public function index(Content $content)
    {
        return $content
            ->header('行政人员年度考核量化表')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengYearcheck());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('userName', __('用户名'));
                $grid->column('exTime', __('审核时间'));
                $grid->column('workflow', __('工作流'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengYearcheck());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_yearcheck',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('userName', __('用户名'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('name', __('姓名'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('classRoom', __('科室'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('kezhang', __('科长'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('pindetaiduAbillityScore', __('品德态度能力得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chuqinScore', __('出勤得分'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workquantityScore', __('工作数量得分'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workjilvScore', __('工作纪律得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workSpecScore', __('工作规范得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workxiaoguoScore', __('工作效果得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('banzhurenScore', __('班主任工作得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('tempWorkScore', __('临时工作得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('thesisScore', __('论文得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('teachingScore', __('教学工作得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('sumScore', __('总得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('exTime', __('审核时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('pindeAbillityScore', __('品德能力得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chuqinbiaoxianScore', __('出勤表现得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workExScore', __('工作审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workJilvExScore', __('工作纪律审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workSpecExScore', __('工作规范审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workxiaoguoExScore', __('工作效果审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('banzhurenWorkExScore', __('班主任工作审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('tempWorkExScore', __('临时工作审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('thesisExScore', __('论文审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('techingExScore', __('教学工作审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('sumExScore', __('总审核得分'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workflow', __('工作流'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('keshiScoreMan', __('科室评分人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('classRoomScoreTime', __('科室评分时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政人员年度考核量化表');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政人员年度考核量化表')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengYearcheck());
        return $content
            ->header('行政人员年度考核量化表')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengYearcheck::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('userName', __('用户名'));
        $show->field('name', __('姓名'));
        $show->field('classRoom', __('科室'));
        $show->field('kezhang', __('科长'));
        $show->field('pindetaiduAbillityScore', __('品德态度能力得分'));
        $show->field('chuqinScore', __('出勤得分'));
        $show->field('workquantityScore', __('工作数量得分'));
        $show->field('workjilvScore', __('工作纪律得分'));
        $show->field('workSpecScore', __('工作规范得分'));
        $show->field('workxiaoguoScore', __('工作效果得分'));
        $show->field('banzhurenScore', __('班主任工作得分'));
        $show->field('tempWorkScore', __('临时工作得分'));
        $show->field('thesisScore', __('论文得分'));
        $show->field('teachingScore', __('教学工作得分'));
        $show->field('sumScore', __('总得分'));
        $show->field('exTime', __('审核时间'));
        $show->field('pindeAbillityScore', __('品德能力得分'));
        $show->field('chuqinbiaoxianScore', __('出勤表现得分'));
        $show->field('workExScore', __('工作审核得分'));
        $show->field('workJilvExScore', __('工作纪律审核得分'));
        $show->field('workSpecExScore', __('工作规范审核得分'));
        $show->field('workxiaoguoExScore', __('工作效果审核得分'));
        $show->field('banzhurenWorkExScore', __('班主任工作审核得分'));
        $show->field('tempWorkExScore', __('临时工作审核得分'));
        $show->field('thesisExScore', __('论文审核得分'));
        $show->field('techingExScore', __('教学工作审核得分'));
        $show->field('sumExScore', __('总审核得分'));
        $show->field('keshiScoreMan', __('科室评分人'));
        $show->field('classRoomScoreTime', __('科室评分时间'));
        $show->field('workflow', __('工作流'));
        return $show;
        }
}

?>