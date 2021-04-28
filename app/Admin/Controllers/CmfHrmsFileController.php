<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsFile;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsFileController extends AdminController {

	protected $title = "人事档案";

    public function index(Content $content)
    {
        return $content
            ->header('人事档案')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsFile());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workId', __('工号'));
                $grid->column('name', __('名称'));
                $grid->column('inDepartment', __('所在部门'));
                $grid->column('IDNo', __('身份证号码'));
                $grid->column('hukou', '户口');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsFile());
                $form->text('workId', __('模块编号'))
                ->creationRules('required|max:200|unique:cmf_hrms_file',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('sex', __('性别'))->options(['1' => '男','0' => '女'])
                ->rules('required');
                $form->radio('marriage', __('婚否'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->date('birthday', __('出生年月日'))
                 ->creationRules('required',['required' => '此项不能为空']);
                $form->text('national', __('国籍'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('political', __('政治面貌'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('IDNo', __('身份证号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('hukou', __('户口'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('jiguan', __('籍贯'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('insuranceNo', __('保险号'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('address', __('联系地址'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('postalCode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('email', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('telephone', __('电话号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('studyExp', __('学习经历'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('professional', __('专业'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('college', __('院校'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staff', __('职员'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staffName', __('职员名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('politicalLevel', __('政治面貌等级'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('computerLevel', __('计算机等级'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('foreign', __('外语'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('foreignLevel', __('外语等级'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('whenWork', __('何时工作'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workTime', __('工作时间'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('workStatus', __('工作状态'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('special', __('特殊情况'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('attach', __('附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('photo', __('照片'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('entryUnitDate', __('进入单位日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('unitWorkTime', __('单位工作时间'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('quitDate', __('离职日期'))
                ->creationRules('required',
                        ['requied' => '此项不能为空']);
                $form->date('nowContractDate', __('现合同日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->date('nowContractEndDate', __('现合同结束日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->date('tuixiuDate', __('退休日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('tuixiuAge', __('退休年龄'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('workInFormal', __('工作形式'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('firstContractDate', __('首个合同日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('techLevel', __('教学等级'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('techExDate', __('教学审核日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('staffType', __('职位类型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('staffbyName', __('职位名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('staffTechScore', __('职位教学分数'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('bank', __('银行'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('bankNo', __('银行帐号'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('salaryLevel', __('收入等级'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('staffyinliBirthday', __('职员生日'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->textarea('personDesp', __('个人描述'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('passport', __('护照'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('bloody', __('血型'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('height', __('身高'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('weight', __('体重'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('eyesight', __('视力'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('health', __('健康情况'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('drivers', __('驾照'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('workExp', __('工作经历'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('workExpAttach', __('工作经历附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('socialRelation', __('社会关系'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('socialRelationAttach', __('社会关系附件'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('recoverStaffDate', __('复职日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('人事档案');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('人事档案')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsFile());
        return $content
            ->header('人事档案')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsFile::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('workId', __('工号'));
        $show->field('name', __('名称'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('sex', __('性别'));
        $show->field('marriage', __('婚否'));
        $show->field('birthday', __('出生年月日'));
        $show->field('national', __('国籍'));
        $show->field('political', __('政治面貌'));
        $show->field('IDNo', __('身份证号码'));
        $show->field('hukou', __('户口'));
        $show->field('jiguan', __('籍贯'));
        $show->field('insuranceNo', __('保险号'));
        $show->field('address', __('联系地址'));
        $show->field('postalCode', __('邮政编码'));
        $show->field('email', __('电子邮件'));
        $show->field('telephone', __('电话号码'));
        $show->field('studyExp', __('学习经历'));
        $show->field('professional', __('专业'));
        $show->field('college', __('院校'));
        $show->field('staff', __('职员'));
        $show->field('staffName', __('职员名称'));
        $show->field('politicalLevel', __('政治面貌等级'));
        $show->field('computerLevel', __('计算机等级'));
        $show->field('foreign', __('外语'));
        $show->field('foreignLevel', __('外语等级'));
        $show->field('whenWork', __('何时工作'));
        $show->field('workTime', __('工作时间'));
        $show->field('workStatus', __('工作状态'));
        $show->field('special', __('特殊情况'));
        $show->field('memo', __('备注'));
        $show->field('attach', __('附件'));
        $show->field('photo', __('照片'));
        $show->field('entryUnitDate', __('入职日期'));
        $show->field('unitWorkTime', __('工作时间'));
        $show->field('quitDate', __('离职日期'));
        $show->field('nowContractDate', __('现合同日期'));
        $show->field('nowContractEndDate', __('现合同结束日期'));
        $show->field('tuixiuDate', __('退休日期'));
        $show->field('tuixiuAge', __('退休年龄'));
        $show->field('workInFormal', __('工作形式'));
        $show->field('firstContractDate', __('首个合同日期'));
        $show->field('techLevel', __('教学等级'));
        $show->field('techExDate', __('教学审核日期'));
        $show->field('staffType', __('职位类型'));
        $show->field('staffbyName', __('职位名称'));
        $show->field('staffTechScore', __('职位教学分数'));
        $show->field('bank', __('银行'));
        $show->field('bankNo', __('银行帐号'));
        $show->field('salaryLevel', __('收入等级'));
        $show->field('staffyinliBirthday', __('职员生日'));
        $show->field('personDesp', __('个人描述'));
        $show->field('passport', __('护照'));
        $show->field('bloody', __('血型'));
        $show->field('height', __('身高'));
        $show->field('weight', __('体重'));
        $show->field('eyesight', __('视力'));
        $show->field('health', __('健康情况'));
        $show->field('drivers', __('驾照'));
        $show->field('workExp', __('工作经历'));
        $show->field('workExpAttach', __('工作经历附件'));
        $show->field('socialRelation', __('社会关系'));
        $show->field('socialRelationAttach', __('社会关系附件'));
        $show->field('recoverStaffDate', __('复职日期'));
        return $show;
        }
}

?>