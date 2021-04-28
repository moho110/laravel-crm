<?php

namespace App\Admin\Controllers;

use App\Models\CmfDictEducation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfDictEducationController extends AdminController {

	protected $title = "教育明细";

    public function index(Content $content)
    {
        return $content
            ->header('教育明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfDictEducation());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('Dict_EducationName', __('名称'));
                $grid->column('Dict_EducationCode', __('代码'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfDictEducation());
                $form->text('Dict_EducationName', __('教育名称'))
                ->creationRules('required|max:200|unique:cmf_dict_education',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('Dict_EducationCode', __('教育代码'))
                ->creationRules('required|max:200|unique:cmf_dict_education',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('教育明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('教育明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfDictEducation());
        return $content
            ->header('教育明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfDictEducation::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('Dict_EducationName', __('教育名称'));
        $show->field('Dict_EducationCode', __('教育代码'));
        return $show;
        }
}

?>