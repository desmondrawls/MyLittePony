class Mlp.Views.Shoes extends Backbone.View
  template: JST['shopping/shoes_index']
  className: 'column span-4 last'

  events:
    'click .clothing-list-item': 'changeShoes'

  initialize: ->
    @shoes = @collection.shoes()
    this.on('change', @render, this)
    this.on('reset', @render, this)
    this.on('add', @appendShoe, this)
    this.on('render', @positionShoes, this)

  render: =>
    console.log("going shoe shopping...")
    console.log(@shoes)
    $(@el).html(@template())
    for shoe in @shoes
      @appendShoe(shoe)
    this

  appendShoe: (shoe) ->
    console.log("appending shoe...")
    console.log(shoe)
    shoe_view = new Mlp.Views.ClothingListItem(model: shoe, id: "shoes-#{shoe.get('id')}")
    @$('#shoes').append(shoe_view.render().el)

  positionShoes: ->
    console.log("shoes: #{@shoes}")
    for shoe, i in @shoes
      console.log(shoe)
      top = (i*80)+57
      left = -1.5
      $("#shoes-#{shoe.get('id')}").css("top", "#{top}px")
      $("#shoes-#{shoe.get('id')}").css("left", "#{left}%")
    this

  changeShoes: (event) ->
    event.preventDefault()
    console.log("Changing Shoes yo...")
    shoe_id = event.currentTarget.id.split("-")[1]
    console.log("you clicked: #{shoe_id}")
    @collection.changeShoes(shoe_id)