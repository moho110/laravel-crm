<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsSocialrelation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsSocialrelationController extends AdminController {

	protected $title = "社会关系";

    public function index(Content $content)
    {
        return $content
            ->header('社会关系')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsSocialrelation());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('relation', __('关系'));
                $grid->column('name', __('姓名'));
                $grid->column('political', __('政治面貌'));
                $grid->column('company', __('公司'));
                $grid->column('staff', '职位');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsSocialrelation());
                $form->text('relation', __('关系'))
                ->creationRules('required|max:200|unique:cmf_hrms_socialrelation',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('political', __('政治面貌'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('company', __('公司'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staff', __('职位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('workId', __('工号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('named', __('命名'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('workAddress', __('工作地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('telephone', __('电话号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('社会关系');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('社会关系')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsSocialrelation());
        return $content
            ->header('社会关系')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsSocialrelation::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('relation', __('关系'));
        $show->field('name', __('名称'));
        $show->field('political', __('政治面貌'));
        $show->field('company', __('公司'));
        $show->field('staff', __('职位'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('workId', __('工号'));
        $show->field('named', __('命名'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('workAddress', __('工作地址'));
        $show->field('telephone', __('电话号码'));
        return $show;
        }
}

?>