<?php

namespace App\Admin\Controllers;

use App\Models\CmfCmdictCountrycode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCmdictCountrycodeController extends AdminController {

	protected $title = "国家代码";

    public function index(Content $content)
    {
        return $content
            ->header('国家代码')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCmdictCountrycode());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('countryName', __('国家名称'));
                $grid->column('countryCode', __('国家代码'));
                $grid->column('postCode', __('邮政编码'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCmdictCountrycode());
                $form->text('countryName', __('国家名称'))
                ->creationRules('required|max:200|unique:cmf_cmdict_countrycode',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('countryCode', __('国家代码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('postCode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('国家代码');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('国家代码')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCmdictCountrycode());
        return $content
            ->header('国家代码')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCmdictCountrycode::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('countryName', __('国家名称'));
        $show->field('countryCode', __('国家名称'));
        $show->field('postCode', __('邮政编码'));
        return $show;
        }
}

?>