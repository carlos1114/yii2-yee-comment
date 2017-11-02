<?php

use yeesoft\db\PermissionsMigration;

class m150825_212941_comment_permissions extends PermissionsMigration
{

    public function safeUp()
    {
        $this->addPermissionsGroup('comment-management', 'Comment Management');
        parent::safeUp();
    }

    public function safeDown()
    {
        parent::safeDown();
        $this->deletePermissionsGroup('comment-management');
    }

    public function getPermissions()
    {
        return [
            'comment-management' => [
                'view-comments' => [
                    'title' => 'View Сomments',
                    'roles' => [self::ROLE_MODERATOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'view'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'grid-sort'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'grid-page-size'],
                    ],
                ],
                'update-comments' => [
                    'title' => 'Update Сomments',
                    'child' => ['view-comments'],
                    'roles' => [self::ROLE_MODERATOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'update'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'bulk-activate'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'bulk-deactivate'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'bulk-spam'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'bulk-trash'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'toggle-attribute'],
                    ],
                ],
                'create-comments' => [
                    'title' => 'Create Сomments',
                    'child' => ['view-comments'],
                    'roles' => [self::ROLE_MODERATOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'create'],
                    ],
                ],
                'delete-comments' => [
                    'title' => 'Delete Сomments',
                    'child' => ['view-comments'],
                    'roles' => [self::ROLE_MODERATOR],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'delete'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'comment/default', 'action' => 'bulk-delete'],
                    ],
                ],
            ],
        ];
    }

}
