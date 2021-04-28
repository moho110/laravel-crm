<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsFileLuyong;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsFileLuyongController extends AdminController {

	protected $title = "录用信息";

    public function index(Content $content)
    {
        return $content
            ->header('录用信息')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsFileLuyong());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('Name', __('名称'));
                $grid->column('jiguan', __('籍贯'));
                $grid->column('college', __('毕业院校'));
                $grid->column('staffName', __('职称'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsFileLuyong());
                $form->text('Name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_hrms_file_luyong',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->radio('sex', __('性别'))->options(['1' => '男','0' => '女'])
                ->rules('required');
                $form->date('birthday', __('出生年月日'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('national', __('民族'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('political', __('政治面貌'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('IDNo', __('身份证号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('jiguan', __('籍贯'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('college', __('院校'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('studyExp', __('学习经历'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staffName', __('职员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('professional', __('专业'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('email', __('电子邮件'))
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
            $content->header('录用信息');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('录用信息')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsFileLuyong());
        return $content
            ->header('录用信息')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsFileLuyong::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('Name', __('名称'));
        $show->field('sex', __('性别'));
        $show->field('birthday', __('出生年月日'));
        $show->field('national', __('民族'));
        $show->field('political', __('政治面貌'));
        $show->field('IDNo', __('身份证号码'));
        $show->field('jiguan', __('籍贯'));
        $show->field('college', __('院校'));
        $show->field('studyExp', __('学习经历'));
        $show->field('staffName', __('职员名称'));
        $show->field('professional', __('专业'));
        $show->field('email', __('电子邮件'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>