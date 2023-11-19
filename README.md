# ecs-wordpress

## Requirement

* [docker](https://docs.docker.com/install/)
* [docker-compose](https://docs.docker.com/compose/)

## Installation

```bash
$ make create-env

# Edit for your environment
$ vi .env

$ make build
$ make up
※ 初回 make up で起動した際に各種インストールが行われる。2回目以降の起動時は再度インストール処理を行わないようにしている。
  プラグインの更新等を行い再度インストール処理を行いたい場合は
  make force-up
  を実行する
```

Open http://localhost:8831 in your browser.<br>
Open http://localhost:8831/wp-admin in your browser.

## Plugin Install
インストールが必要なプラグインをaws環境でも反映させる場合、<br>
`etc/docker/app/plugin/{site_name}`<br>
に<br>
`wpackagist-plugin/{plugin_name}:*`<br>
の要領で記述する必要がある

例 `wpackagist-plugin/table-of-contents-plus:*`

ローカル上で、appコンテナ起動時にプラグインがインストールされると、 etc/site/{サイト名}/composer.json, composer.lock が更新されるのでこれをgit commit し反映させる

インストール後はWordPressのプラグイン設定から該当のプラグインの「有効化」が必要なので忘れずに行うこと
