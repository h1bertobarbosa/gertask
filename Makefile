dev:
	docker-compose run -p 80:80 --rm development
clean:
	docker-compose down
	docker volume ls -qf dangling=true | xargs -r docker volume rm

