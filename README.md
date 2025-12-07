# docker-wordpress

## Requirement

* [docker](https://docs.docker.com/install/)
* [docker-compose](https://docs.docker.com/compose/)

## Installation


```bash
$ make create-env

# Edit for your environment
$ vi .env

SITE, WEB_PORT, DB_PORT を設定

`etc/site/` 配下に SITE で指定したディレクトリを作成する。(composer.json, composer.lock を配置する)

必要に応じて、'etc/docker/app/theme/', 'etc/docker/app/file/', 'etc/docker/app/plugin/'  配下に SITE で指定したファイルを作成する。 何もなければファイル作成は不要。


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

```
プラグイン追加
$ make add-plugin name={プラグイン名}
ex) $ make add-plugin name=all-in-one-seo-pack

プラグイン削除
$ make del-plugin name={プラグイン名}

プラグイン更新
$ make update-plugin name={プラグイン名}
```

ローカル上で、appコンテナ起動時にプラグインがインストールされると、 etc/site/{サイト名}/composer.json, composer.lock が更新されるのでこれをgit commit し反映させる

インストール後はWordPressのプラグイン設定から該当のプラグインの「有効化」が必要なので忘れずに行うこと

## Theme Install(Update)
Wordpress管理UIからインストールしたテーマは `web/app/themes/` にインストールされるが、
aws環境に反映させるためには `data/themes` へのコピーが必要。
以下のコマンドでコピーできる
```
$ make update-theme
```
コマンド実行後、更新したテーマの差分がGitの差分として出るので、commit & push を行う。
テーマエディタでテーマのファイルを更新した際も同様の処理が必要。


## composer.json
`etc/site` 配下にサイトごとのディレクトリを作成し、その中にcomposer.jsonを配置することで、サイトごとにプラグインを管理することができる。
local環境では、`etc/docker/app/docker-entrypoint.sh` で etc/site/${SITE}/composer.json を /var/www/html/composer.json にリンクさせている。
