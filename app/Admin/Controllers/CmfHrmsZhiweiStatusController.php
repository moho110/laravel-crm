<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsZhiweiStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsZhiweiStatusController extends AdminController {

	protected $title = "职位状态";

    public function index(Content $content)
    {
        return $content
            ->header('职位状态')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsZhiweiStatus());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('Name', __('名称'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsZhiweiStatus());
                $form->text('Name', __('模块编号'))
                ->creationRules('required|max:200|unique:cmf_hrms_zhiwei_status',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('职位状态');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('职位状态')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsZhiweiStatus());
        return $content
            ->header('职位状态')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsZhiweiStatus::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('Name', __('名称'));
        return $show;
        }
}

?>