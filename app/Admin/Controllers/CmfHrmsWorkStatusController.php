<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsWorkStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsWorkStatusController extends AdminController {

	protected $title = "工作状态";

    public function index(Content $content)
    {
        return $content
            ->header('工作状态')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsWorkStatus());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('status', __('状态'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsWorkStatus());
                $form->text('status', __('状态'))
                ->creationRules('required|max:200|unique:cmf_hrms_work_status',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('工作状态');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('工作状态')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsWorkStatus());
        return $content
            ->header('工作状态')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsWorkStatus::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('status', __('状态'));
        return $show;
        }
}

?>