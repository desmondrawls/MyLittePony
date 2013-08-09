class PoniesController < ApplicationController
respond_to :html, :json

def new
	respond_with Pony.new
end

def index
	respond_with Pony.all 
end

def show
	respond_with Pony.find(params[:id])
end

def create
  respond_with Pony.create(params[:pony])
end

def update
	respond_with Pony.update(params[:id], params[:pony])
end

def destroy
	respond_with Pony.destroy(params[:id])
end

end
