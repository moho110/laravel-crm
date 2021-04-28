<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsZprencaiku;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsZprencaikuController extends AdminController {

	protected $title = "人才库";

    public function index(Content $content)
    {
        return $content
            ->header('人才库')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsZprencaiku());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('Name', __('姓名'));
                $grid->column('birthday', __('生日'));
                $grid->column('jiguan', __('籍贯'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsZprencaiku());
                $form->text('Name', __('姓名'))
                ->creationRules('required|max:200|unique:cmf_hrms_zprencaiku',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->radio('sex', __('性别'))->options(['1' => '男','0' => '女'])
                ->rules('required');
                $form->text('contact', __('联系方式'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('IDNo', __('身份证号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('national', __('民族'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('birthday', __('出生年月日'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('political', __('政治面貌'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('jiguan', __('籍贯'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('hukouInPos', __('户口位置'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('studyExp', __('学习经历'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staffName', __('职位名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('college', __('院校'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('professional', __('专业'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('secPro', __('第二专业'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('email', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('familyTelephone', __('家庭电话'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('familyAddr', __('家庭住址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('postalCode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('edution', __('教育程度'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('workExp', __('工作经历'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('selfEval', __('自我评价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('englishAbillity', __('英语能力'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('traingExp', __('训练经历'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('photo', __('照片'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('attach', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('projectExp', __('项目经验'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('resumeLetter', __('求职信'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('proObject', __('专业目标'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('luyongStatus', __('录用状态'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('人才库');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('人才库')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsZprencaiku());
        return $content
            ->header('人才库')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsZprencaiku::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('Name', __('姓名'));
        $show->field('sex', __('性别'));
        $show->field('contact', __('联系方式'));
        $show->field('IDNo', __('身份证号码'));
        $show->field('national', __('民族'));
        $show->field('birthday', __('出生年月日'));
        $show->field('political', __('政治面貌'));
        $show->field('jiguan', __('籍贯'));
        $show->field('hukouInPos', __('户口位置'));
        $show->field('studyExp', __('学习经历'));
        $show->field('staffName', __('职位名称'));
        $show->field('college', __('院校'));
        $show->field('professional', __('专业'));
        $show->field('secPro', __('第二专业'));
        $show->field('email', __('电子邮件'));
        $show->field('familyTelephone', __('家庭电话'));
        $show->field('familyAddr', __('家庭住址'));
        $show->field('postalCode', __('邮政编码'));
        $show->field('edution', __('教育程度'));
        $show->field('workExp', __('工作经历'));
        $show->field('selfEval', __('自我评价'));
        $show->field('englishAbillity', __('英语能力'));
        $show->field('traingExp', __('训练经历'));
        $show->field('photo', __('照片'));
        $show->field('attach', __('附件'));
        $show->field('projectExp', __('项目经验'));
        $show->field('resumeLetter', __('求职信'));
        $show->field('proObject', __('专业目标'));
        $show->field('luyongStatus', __('录用状态'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>