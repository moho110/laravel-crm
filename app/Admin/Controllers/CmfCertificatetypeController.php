<?php

namespace App\Admin\Controllers;

use App\Models\CmfCertificatetype;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCertificatetypeController extends AdminController {

	protected $title = "认证类型";

    public function index(Content $content)
    {
        return $content
            ->header('认证类型')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCertificatetype());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('name', __('名称'));
                $grid->column('user_id', __('用户ID'));
                $grid->column('code', __('代码'));
                $grid->column('user_flag', '用户标识')
                    ->display(function ($user_flag) {
                        return $user_flag ? '<span style="color:green;">已处理</span>' : '<span style="color:red;">未处理</span>';
                    });
                
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCertificatetype());
                $form->text('name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_certificatetype',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('code', __('代码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('认证类型');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('认证类型')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCertificatetype());
        return $content
            ->header('认证类型')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCertificatetype::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        $show->field('user_id', __('用户ID'));
        $show->field('code', __('代码'));
        $show->field('user_flag', __('用户标识'))->as(function($user_flag) {
            if($user_flag == 1) {
                $user_flag='已处理';
            }else {
                $user_flag='未处理';
            }
            return $user_flag;
        });
        return $show;
        }
}

?>