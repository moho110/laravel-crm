<?php

namespace App\Admin\Controllers;

use App\Models\CmfDormBuilding;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfDormBuildingController extends AdminController {

	protected $title = "宿舍楼";

    public function index(Content $content)
    {
        return $content
            ->header('宿舍楼')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfDormBuilding());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('buildingName', __('宿舍楼名称'));
                $grid->column('buildingSum', __('宿舍总数'));
                $grid->column('floorNumber', __('楼层数'));
                $grid->column('masterTeacherOne', __('主管教师一'));
                $grid->column('manageBoundaryOne', '管理范围一');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfDormBuilding());
                $form->text('buildingName', __('宿舍楼名称'))
                ->creationRules('required|max:200|unique:cmf_dorm_building',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('buildingSum', __('宿舍总数'))
                ->creationRules('required|max:200|integer',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('floorNumber', __('楼层数'))
                ->creationRules('required|max:200|integer',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('masterTeacherOne', __('主管教师一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('manageBoundaryOne', __('管理范围一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('masterTeacherTwo', __('主管教师二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('manageBoundaryTwo', __('管理范围二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('masterTeacherThree', __('主管教师三'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('manageBoundaryThree', __('管理范围三'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('masterTeacherFour', __('主管教师四'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('manageBoundaryFour', __('管理范围四'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('stuSex', __('学生性别'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('宿舍楼');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('宿舍楼')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfDormBuilding());
        return $content
            ->header('宿舍楼')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfDormBuilding::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('buildingName', __('宿舍楼'));
        $show->field('buildingSum', __('宿舍总数'));
        $show->field('floorNumber', __('楼层数'));
        $show->field('masterTeacherOne', __('主管教师一'));
        $show->field('manageBoundaryOne', __('管理范围一'));
        $show->field('masterTeacherTwo', __('主管教师二'));
        $show->field('manageBoundaryTwo', __('管理范围二'));
        $show->field('masterTeacherThree', __('主管教师三'));
        $show->field('manageBoundaryThree', __('管理范围三'));
        $show->field('masterTeacherFour', __('主管教师四'));
        $show->field('manageBoundaryFour', __('管理范围四'));
        $show->field('stuSex', __('学生性别'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>