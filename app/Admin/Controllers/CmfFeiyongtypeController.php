<?php

namespace App\Admin\Controllers;

use App\Models\CmfFeiyongtype;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFeiyongtypeController extends AdminController {

	protected $title = "费用类型";

    public function index(Content $content)
    {
        return $content
            ->header('费用类型')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFeiyongtype());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('typename', __('类别名称'));
                $grid->column('classid', __('类别ID'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFeiyongtype());
                $form->text('typename', __('类别名称'))
                ->creationRules('required|max:200|unique:cmf_feiyongtype',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('classid', __('类别ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('iflock', __('是否锁定'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('费用类型');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('费用类型')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFeiyongtype());
        return $content
            ->header('费用类型')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFeiyongtype::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('typename', __('类别名称'));
        $show->field('classid', __('类别ID'));
        $show->field('iflock', __('是否锁定'));
        return $show;
        }
}

?>