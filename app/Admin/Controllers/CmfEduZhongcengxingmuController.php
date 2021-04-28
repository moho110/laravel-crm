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

class CmfEduZhongcengxingmuController extends AdminController {

	protected $title = "中层干部测评项目明细";

    public function index(Content $content)
    {
        return $content
            ->header('中层干部测评项目明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduZhongcengrenyuan());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('scoreinvalue', __('分值'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduZhongcengrenyuan());
                $form->text('projects', __('项目'))
                ->creationRules('required|max:200|unique:cmf_edu_zhongcengxingmu',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('scoreinvalue', __('分值'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('中层干部测评项目明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('中层干部测评项目明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduZhongcengrenyuan());
        return $content
            ->header('中层干部测评项目明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduZhongcengrenyuan::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('projects', __('项目'));
        $show->field('scoreinvalue', __('分值'));
        return $show;
        }
}

?>